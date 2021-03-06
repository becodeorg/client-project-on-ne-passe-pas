import { useState, useEffect } from "react";
import { Link } from "react-router-dom";
import { Swiper, SwiperSlide } from 'swiper/react';
import SwiperCore, { Autoplay } from 'swiper';
import { styled, Box } from '@mui/system';
import ModalUnstyled from '@mui/base/ModalUnstyled';
import axios from "axios";
import 'swiper/css';

SwiperCore.use([Autoplay]);

const MainIntro = () => {

    const [introductionPosition, setIntroductionPosition] = useState(1);
    const [imageSlider, setImageSlider] = useState([]);
    const [introductionText, setIntroductionText] = useState('');
    const [introductionQuizz, setIntroductionQuizz] = useState('');
    const [introductionQuizzReponse1, setIntroductionQuizzReponse1] = useState('');
    const [introductionQuizzReponse2, setIntroductionQuizzReponse2] = useState('');
    const [introductionQuizzReponse3, setIntroductionQuizzReponse3] = useState('');
    const [introductionQuizzReponse4, setIntroductionQuizzReponse4] = useState('');

    const [open, setOpen] = useState(false);
    const handleOpen = () => setOpen(true);
    const handleClose = () => setOpen(false);

    function changeStatePosition() {
        if (introductionPosition === 1)
            setIntroductionPosition(2);
        if (introductionPosition === 2)
            setIntroductionPosition(3)
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

        db.get('http://localhost/client-project-on-ne-passe-pas/backend/api/intro.php', { cache: "reload" })
            .then((response) => {
                console.log(response.data)
                if (introductionPosition === 1) {
                    setImageSlider(response.data[0].carrousel1);
                    setIntroductionText(response.data[0].text_fr);
                }
                if (introductionPosition === 2) {
                    setImageSlider(response.data[0].carrousel2);
                    setIntroductionText(response.data[0].text2_fr);
                }
                if (introductionPosition === 3) {
                    setIntroductionQuizz(response.data[0].question_fr);
                    setIntroductionQuizzReponse1(response.data[0].reponse1_fr);
                    setIntroductionQuizzReponse2(response.data[0].reponse2_fr);
                    setIntroductionQuizzReponse3(response.data[0].reponse3_fr);
                    setIntroductionQuizzReponse4(response.data[0].reponse4_fr);
                }
            })
            .catch(err => console.log(err))
    }, [introductionPosition])
    console.log(introductionPosition, ' -------- ', introductionText)

    if (imageSlider && !introductionQuizz) {
        return (

            <main className='main-slides'>
                <div className='swiper'>
                    <Swiper
                        spaceBetween={50}
                        slidesPerView={1}
                        onSlideChange={() => console.log('slide change')}
                        onSwiper={(swiper) => console.log(swiper)}
                        autoplay={{
                            "delay": 2500,
                            "disableOnInteraction": false
                        }}
                    > {imageSlider.map((list) =>
                        <SwiperSlide key={list.index}><img className="swiper-image" src={list.image} alt="on ne passe pas" /></SwiperSlide>
                    )}
                    </Swiper>
                </div>
                <article className='textzone-slides'>
                    <p className='text-slides'>
                        {introductionText}
                    </p>
                </article>
                <button onClick={changeStatePosition} className="next-slides">Suivant</button>
            </main>
        );
    }
    if (introductionQuizz && introductionPosition === 3) {
        return (
            <main className='quizz-slides'>
                <article className='quizz-placement'>
                    <h3>
                        {introductionQuizz}
                    </h3>
                    <div className="quizz">
                        <button type='button' className="btn-quizz" onClick={handleOpen}>
                            {introductionQuizzReponse1}
                        </button>
                        <StyledModal
                            aria-labelledby="unstyled-modal-title"
                            aria-describedby="unstyled-modal-description"
                            open={open}
                            onClose={handleClose}
                            BackdropComponent={Backdrop}
                        >
                            <Box sx={style}>
                                <h2 id="unstyled-modal-title">Bonne r??ponse !</h2>
                                <p id="unstyled-modal-description">Cliquez sur le lien suivant pour acc??der ?? la suite de l'application.</p>
                                <Link to={'/Slides'} ><button type="button" style={nextBtn}>Suivant</button></Link>
                            </Box>
                        </StyledModal>
                        <button className="btn-quizz" onClick={(e) => { e.target.style.backgroundColor = 'red' }}>{introductionQuizzReponse2}</button>
                        <button className="btn-quizz" onClick={(e) => { e.target.style.backgroundColor = 'red' }}>{introductionQuizzReponse3}</button>
                        <button className="btn-quizz" onClick={(e) => { e.target.style.backgroundColor = 'red' }}>{introductionQuizzReponse4}</button>
                    </div>
                </article>
            </main>
        )
    }
};

export default MainIntro;
