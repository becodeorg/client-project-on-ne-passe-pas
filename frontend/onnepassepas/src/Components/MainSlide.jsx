import { useState, useEffect } from "react";
import { Link } from "react-router-dom";
import { Swiper, SwiperSlide } from 'swiper/react';
import SwiperCore, { Autoplay } from 'swiper';
import { styled, Box } from '@mui/system';
import ModalUnstyled from '@mui/base/ModalUnstyled';
import axios from "axios";

const MainSlides = () => {

    const [slidePosition, setSlidePosition] = useState(1);
    const [slideNumber, setSlideNumber] = useState(1)
    const [image, setImage] = useState([]);
    const [slideText, setSlideText] = useState('');
    const [slideQuizz, setSlideQuizz] = useState('');
    const [slideQuizzReponse1, setSlideQuizzReponse1] = useState('');
    const [slideQuizzReponse2, setSlideQuizzReponse2] = useState('');
    const [slideQuizzReponse3, setSlideQuizzReponse3] = useState('');
    const [slideQuizzReponse4, setSlideQuizzReponse4] = useState('');

    const [open, setOpen] = useState(false);
    const handleOpen = () => setOpen(true);
    const handleClose = () => setOpen(false);

    function changeStatePosition() {
        setSlidePosition(slidePosition + 1)
    }

    function changeStateNumber() {
        setSlideNumber(slideNumber + 1);
        setSlidePosition(1);
    }

    const StyledModal = styled(ModalUnstyled)`
        position: fixed;
        z-index: 1300;
        right: 0;
        bottom: 0;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        `;

    const Backdrop = styled('div')`
            z-index: -1;
            position: fixed;
            right: 0;
            bottom: 0;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.25);
            -webkit-tap-highlight-color: transparent;
            `;

    const style = {
        width: 400,
        bgcolor: 'white',
        border: '2px solid #000',
        display: 'flex',
        flexDirection: 'column',
        alignItems: 'center',
        justifyContent: 'center',
        gap: '0.5rem',
        p: 2,
        px: 4,
        pb: 3,
    };

    const nextBtn = {
        margin: '0.5rem',
        width: '5rem',
        height: '2.5rem',
        fontSize: '1rem',
        border: 'none',
        backgroundColor: 'rgb(112,132,104)',
    }

    useEffect(() => {

        const db = axios.create({
            timeout: 2000,
            headers: { 'Content-Type': 'application/json; charset=utf-8' },
            validateStatus: function (status) {
                return status >= 200 && status < 300;
            },
        });

        db.get(`http://localhost/client-project-on-ne-passe-pas/backend/api/slide.php?slide=${slideNumber}`, { cache: "reload" })
            .then((response) => {
                console.log(response.data)
                setImage(response.data[0].image);
                setSlideText(response.data[0].text_fr);
                if (slidePosition === 2)
                    setSlideQuizz(response.data[0].question_fr);
                setSlideQuizzReponse1(response.data[0].reponse1_fr);
                setSlideQuizzReponse2(response.data[0].reponse2_fr);
                setSlideQuizzReponse3(response.data[0].reponse3_fr);
                setSlideQuizzReponse4(response.data[0].reponse4_fr);
            })
            .catch(err => console.log(err))
    }, [slideNumber, slidePosition])

    console.log(slidePosition, slideNumber)

    if (image && !slideQuizz) {
        return (

            <main className='main-slides'>
                <img className="image-slide" src={image} alt="slide 1 pic" />
                <article className='textzone-slides'>
                    <p className='text-slides'>
                        {slideText}
                    </p>
                </article>
                <button onClick={changeStatePosition} className="next-slides">Suivant</button>
            </main>
        );
    }
    if (slideQuizz && slidePosition === 2) {
        return (
            <main className='quizz-slides'>
                <article className='quizz-placement'>
                    <h3>
                        {slideQuizz}
                    </h3>
                    <div className="quizz">
                        <button type='button' className="btn-quizz" onClick={handleOpen}>
                            {slideQuizzReponse1}
                        </button>
                        <StyledModal
                            aria-labelledby="unstyled-modal-title"
                            aria-describedby="unstyled-modal-description"
                            open={open}
                            onClose={handleClose}
                            BackdropComponent={Backdrop}
                        >
                            <Box sx={style}>
                                <h2 id="unstyled-modal-title">Bonne réponse !</h2>
                                <p id="unstyled-modal-description">Cliquez sur le lien suivant pour accèder à la suite de l'application.</p>
                                <button type="button" style={nextBtn} onClick={changeStateNumber}>Suivant</button>
                            </Box>
                        </StyledModal>
                        <button className="btn-quizz" onClick={(e) => { e.target.style.backgroundColor = 'red' }}>{slideQuizzReponse2}</button>
                        <button className="btn-quizz" onClick={(e) => { e.target.style.backgroundColor = 'red' }}>{slideQuizzReponse3}</button>
                        <button className="btn-quizz" onClick={(e) => { e.target.style.backgroundColor = 'red' }}>{slideQuizzReponse4}</button>
                    </div>
                </article>
            </main >
        )
    }
    else {
        return (<p>Loading...</p>)
    }
}

export default MainSlides;