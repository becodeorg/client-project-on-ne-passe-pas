import france from '../Images/france.svg';
import nederlands from '../Images/nederlands.svg';
import uk from '../Images/uk.svg';

const HeaderAccueil = () => {

    return (
        <header className='header-acc'>
            <nav className="lang">
                <img className='flags-logo' src={france} alt="français" />
                <img className='flags-logo' src={nederlands} alt="dutch" />
                <img className='flags-logo' src={uk} alt="english" />
            </nav>
        </header>
    )
}

export default HeaderAccueil;