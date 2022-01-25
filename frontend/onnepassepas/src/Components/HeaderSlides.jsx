import logo from '../Images/Logo_onpp2.png';



const HeaderSlides = () => {

    return (
        <header className='header-slides'>
            <section className="rounded-bar">
                <img className='flags-logo' src={logo} alt="logo-app" />
            </section>
        </header>
    )
}

export default HeaderSlides;