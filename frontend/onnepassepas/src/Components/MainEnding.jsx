import { useState } from "react";
import AuthCode from 'react-auth-code-input';

const MainEnding = () => {

    const [codeNumber, setCodeNumber] = useState('');
    const handleChange = (res) => {
        setCodeNumber(res)
    };

    const nextBtn = {
        margin: '0.5rem',
        width: '5rem',
        height: '2.5rem',
        fontSize: '1rem',
        border: 'none',
        backgroundColor: 'rgb(112,132,104)',
    }
    if (codeNumber.length < 4) {
        return (

            <main className='end-slide'>
                <h4 className="ending-text">
                    Durant votre parcours vous aurez sûrement remarqué les couleurs qui sont apparues sur votre écran et repérés les roches de couleurs au sol un peu partout. Au dos de ceux-ci se trouvaient des numéros, quels étaient-ils ?
                </h4>
                <AuthCode
                    characters={4}
                    onChange={handleChange}
                    containerClassName='end-slide'
                    inputClassName='four-digit-code'
                />
            </main>
        );
    }
    if (codeNumber === '1234') {
        return (
            <main className="end-slide">
                <div className="p-container">
                    <p className="ending-p">
                        Bravo ! Vous venez de finir notre parcours et vous avez répondu avec succès à toutes nos questions.
                    </p>
                    <p className="ending-p">
                        Dernière étape : Vous rendre à l'accueil pour recevoir votre récompense !
                    </p>
                </div>
            </main>
        )
    }
    if (codeNumber.length === 4 && codeNumber !== 1234) {
        return (
            <main className='end-slide'>
                <AuthCode
                    characters={4}
                    onChange={handleChange}
                    containerClassName='container'
                    inputClassName='input'
                />
                <h1>
                    Vous avez malheureusement raté, essayez de vous souvenir de l'ordre des couleurs et donc des numéros !
                </h1>
            </main>
        )
    }
}

export default MainEnding;