import Layout from "../../Layouts/Layout";

function Photography() {
    return (
        <>
            <h1 className="text-blue-900 font-black text-5xl">Photography</h1>
            <a href="/portfolio">Back</a>
        </>
    );
}

Photography.layout = (page) => <Layout children={page} />;

export default Photography;
