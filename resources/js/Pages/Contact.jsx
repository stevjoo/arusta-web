import Layout from "../Layouts/Layout";

function Contact() {
    return (
        <>
            <h1 className="text-blue-900 font-black text-5xl">
                Contact 
            </h1>
        </>
    );
}

Contact.layout = page => <Layout children={page} />

export default Contact;