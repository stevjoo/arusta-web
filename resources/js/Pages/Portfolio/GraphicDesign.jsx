import Layout from "../../Layouts/Layout";

function GraphicDesign() {
    return (
        <>
            <h1 className="text-blue-900 font-black text-5xl">GraphicDesign</h1>
            <a href="/portfolio">Back</a>
        </>
    );
}

GraphicDesign.layout = (page) => <Layout children={page} />;

export default GraphicDesign;
