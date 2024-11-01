import Layout from "../Layouts/Layout";

function Home() {
    return (
        <>
            <h1 className="text-blue-900 font-black text-5xl">Home</h1>
        </>
    );
}

Home.layout = page => <Layout children={page} />

export default Home;