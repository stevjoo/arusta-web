import Layout from "../../Layouts/Layout";

function VideoReels() {
    return (
        <>
            <h1 className="text-blue-900 font-black text-5xl">VideoReels</h1>
            <a href="/portfolio">Back</a>
        </>
    );
}

VideoReels.layout = (page) => <Layout children={page} />;

export default VideoReels;
