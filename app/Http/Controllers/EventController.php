<?php
//EventController
namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    public function index()
    {
        return view('event');
    }

    public function adminIndex()
    {
    $events = Event::all();
    $users = User::with('registerevent')->paginate(10);

    return view('admin.events', compact('events', 'users'));
    }


    public function listEvent(Request $request)
    {
        $start = $request->start ? date('Y-m-d', strtotime($request->start)) : null;
        $end = $request->end ? date('Y-m-d', strtotime($request->end)) : null;
        $date = $request->date ? date('Y-m-d', strtotime($request->date)) : null;

        if ($date) {
            $events = Event::where('status', 'approved')
                ->where('start_date', '<=', $date)
                ->where('end_date', '>=', $date)
                ->get();

            return view('events-on-date', ['events' => $events, 'date' => $date]);
        } else {
            $events = Event::where('status', 'approved')
                ->where('start_date', '>=', $start)
                ->where('end_date', '<=', $end)
                ->get()
                ->map(fn ($item) => [
                    'id' => $item->id,
                    'title' => $item->title,
                    'start' => $item->start_date,
                    'end' => date('Y-m-d', strtotime($item->end_date . '+1 days')),
                    'category' => $item->category,
                    'className' => match ($item->category) {
                    'Paket 1' => ['bg-success'],
                    'Paket 2' => ['bg-danger'],
                    'Paket 3' => ['bg-warning'],
                    default => ['bg-success'],
                    },
                ]);

            return response()->json($events);
        }
    }

    public function eventsOnDate($date)
    {
        $events = Event::where('status', 'approved')
            ->where('start_date', '<=', $date)
            ->where('end_date', '>=', $date)
            ->get();

        return view('events-on-date', compact('events', 'date'));
    }


    public function create(Event $event)
    {
        return view('event-form', ['data' => $event, 'action' => route('events.store')]);
    }

    public function store(EventRequest $request)
    {
        $event = new Event;
        $event->user_id = Auth::id();
        $event->title = $request->title;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->category = $request->category;
        $event->save();

        return redirect()->route('dashboard')->with('status', 'Reservation submitted, pending approval');
    }

    public function edit(Event $event)
    {
        return view('admin.edit-events', ['data' => $event, 'action' => route('events.update', $event->id)]);
    }

    public function update(EventRequest $request, Event $event)
    {
        if ($request->has('delete')) {
            return $this->destroy($event);
        }

        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->title = $request->title;
        $event->category = $request->category;

        $event->save();

        return redirect()->route('admin-events')->with('status', 'Event approved successfully');
    }
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events')->with('status', 'Event deleted successfully');
    }

    public function approve($id)
    {
        $event = Event::findOrFail($id);
        $event->status = 'Approved';
        $event->save();

        return redirect()->route('admin-events')->with('status', 'Event approved successfully');
    }

}