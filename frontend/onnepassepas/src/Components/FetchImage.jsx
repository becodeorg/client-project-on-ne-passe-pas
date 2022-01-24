import { useState } from "react"

const FetchBgImg = () => {

    const [img, setImg] = ('');

    fetch('/client-project-on-ne-passe-pas/backend/assets/image/')
        .then((res) => {
            console.log(res)
            setImg(res)
        })

    return (
        <img className="bg-image" src={img} />
    )
}

export default FetchBgImg;