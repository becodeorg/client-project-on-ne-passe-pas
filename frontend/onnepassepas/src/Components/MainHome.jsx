import logo from '../Images/Logo_onpp2.png';
import papierCollant from '../Images/papier-collant.png'
import QrContainer from './QRReader';

import { Link } from 'react-router-dom';
import styled from 'styled-components';
import colors from '../Style/colors';

const HomeMain = styled.section`   
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: ${colors.khaki};
`

const TitleContainer = styled.div`
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 10rem;
    background-image: url(${papierCollant});
    background-size: cover;
`
const Logo = styled.img`
    max-width: 50%;
`
const Title = styled.h1`
    font-family: 'Courier New', Courier, monospace;
    font-size: 40px;
    font-weight: 600;
    color: ${colors.beige};
    text-transform: uppercase;
    text-align: center;
`
const Subtitle = styled.p`
    font-family: 'Helvetica', Arial, sans-serif;
    font-weight: 200;
    color: ${colors.beige};
`

const MainHome = () => {

    return (
        <HomeMain>
            
            <TitleContainer>
                <Title>On ne passe pas</Title>
                {/* <Logo src={logo} alt="logo-app" /> */}
                <Subtitle>Site historique de Brûly-de-Pesches</Subtitle>
            </TitleContainer>

            <Link to="/Introduction" className='link'>Suite</Link>
            
            <QrContainer />

        </HomeMain>
    )
}

export default MainHome;