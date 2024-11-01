export default function Layout({ children }){
    return (
        <>
            <header>
                <nav className="space-x-6">
                    <a href="/">HOME</a>
                    <a href="/behindthelense">BEHIND THE LENSE</a>
                    <a href="/portfolio">PORTOFOLIO</a>
                    <a href="/contact">CONTACT</a>
                </nav>
            </header>

            <main>{children}</main>

            {/* sementara pake text dulu nnti pake svg */}
            <footer className="space-x-2">
                <a
                    target="_blank"
                    href="https://wa.me/+628561810555"
                >
                    Whatsapp
                </a>
                <a
                    target="_blank"
                    href="https://www.instagram.com/arusta.id?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                >
                    Instagram
                </a>
                <a target="_blank" href="https://www.youtube.com/user/arusta">
                    Youtube
                </a>
                <a target="_blank" href="https://x.com/wayanar">
                    X
                </a>
                <a
                    target="_blank"
                    href="https://web.facebook.com/wayanar?_rdc=1&_rdr"
                >
                    Facebook
                </a>
            </footer>
        </>
    );
}