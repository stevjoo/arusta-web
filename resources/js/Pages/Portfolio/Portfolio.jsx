import Layout from "../../Layouts/Layout";

function portfolio() {
    return (
        <>
            <h1 className="text-blue-900 font-black text-5xl">Portfolio</h1>
            <div className="space-x-5">
                <a href="/video-reels">Video Reels</a>
                <a href="/photography">Photography</a>
                <a href="/graphic-design">Graphic Design</a>
            </div>
        </>
    );
}

portfolio.layout = page => <Layout children={page}/>

export default portfolio;