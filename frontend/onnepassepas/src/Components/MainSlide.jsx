import { useState } from "react";
import { Swiper, SwiperSlide } from 'swiper/react';
import SwiperCore, { Autoplay } from 'swiper';
import 'swiper/css';

SwiperCore.use([Autoplay]);

const MainSlide = () => {

    const [introductionPosition, setIntroductionPosition] = useState(1);

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
                >
                    <SwiperSlide>Slide 1</SwiperSlide>
                    <SwiperSlide>Slide 2</SwiperSlide>
                    <SwiperSlide>Slide 3</SwiperSlide>
                    <SwiperSlide>Slide 4</SwiperSlide>
                    <SwiperSlide>Slide 5</SwiperSlide>
                </Swiper>
            </div>
            <article className='textzone-slides'>
                <h2 className='title-slides'>

                </h2>
                <p className='text-slides'>

                </p>
            </article>
        </main>
    );
};

export default MainSlide;

//introductionPosition +1

/* if (3) {
    <Link to...
} */