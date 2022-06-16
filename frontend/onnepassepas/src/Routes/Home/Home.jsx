
import HeaderHome from "../../Components/HeaderHome";
import MainHome from "../../Components/MainHome";

// import '../../App.css';

import styled from 'styled-components';
import colors from '../../Style/colors';

const HomeWrapper  = styled.div`
    background: ${colors.khaki};
    height: 100%;
`

const Home = () => {

    return (
        <HomeWrapper>
            <HeaderHome />
            <MainHome />
        </HomeWrapper>
    )
}

export default Home;