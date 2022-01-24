import HeaderAccueil from "../../Components/HeaderAccueil";
import MainAccueil from "../../Components/MainAccueil";
import FetchBgImg from "../../Components/FetchImage";

const Accueil = () => {

    return (
        <>
            <FetchBgImg />
            <HeaderAccueil />
            <MainAccueil />
        </>
    )
}

export default Accueil;