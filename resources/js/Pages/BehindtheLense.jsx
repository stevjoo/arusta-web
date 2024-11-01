import Layout from "../Layouts/Layout";

function behindthelense() {
    return (
        <>
            <h1 className="text-blue-900 font-black text-5xl">Behind The Lense</h1>
        </>
    );
}

behindthelense.layout = page => <Layout children={page} />

export default behindthelense