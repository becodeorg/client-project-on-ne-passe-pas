import logo from '../Images/Logo_onpp2.png';
import QrContainer from './QRReader';
const MainAccueil = () => {

    return (
        <main className='main-acc'>
            <section className="desc-app">
                <h1>ON NE PASSE PAS.</h1>
                <img className='flags-logo' src={logo} alt="logo-app" />
                <p>Site historique de Brûly-de-Pesches.</p>
            </section>
            <QrContainer />
        </main>
    )
}

export default MainAccueil;