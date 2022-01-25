import { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import axios from "axios";
import HeaderAccueil from "../../Components/HeaderAccueil";
import MainAccueil from "../../Components/MainAccueil";
import '../../App.css';

const Accueil = () => {

    const [img, setImg] = useState('');

    useEffect(() => {

        const db = axios.create({
            timeout: 2000,
            validateStatus: function (status) {
                return status >= 200 && status < 300;
            },
        });

        db.get('http://localhost/client-project-on-ne-passe-pas/backend/api/accueil.php', { cache: "reload" })
            .then((response) => {
                console.log(response.data[0])
                setImg(response.data[0].image);
            })
            .catch(err => console.log(err))
    }, [])

    const bgStyle = {
        backgroundImage: `url(${img})`,
        backgroundSize: 'cover',
        backgroundRepeat: 'no-repeat',
        backgroundPosition: 'center',
        height: '100%'
    }

    return (
        <div className="bg-image" style={bgStyle}>
            <HeaderAccueil />
            <MainAccueil />
            <Link to="/Introduction" className='link'>Suite</Link>
        </div>
    )
}

export default Accueil;