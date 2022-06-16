import france from '../Images/flag-france.svg';
import nederlands from '../Images/flag-netherlands.svg';
import uk from '../Images/flag-uk.svg';

import styled from 'styled-components';

const HeaderWrapper = styled.header`
    padding-top: 2rem;
    margin-right: 1rem;
`
const LanguagesWrapper = styled.nav`
    display: flex;
    flex-direction: row;
    justify-content: right;
    align-items: flex-end;
    gap: 0.5rem;
`
const Language = styled.img`
    width: 35px;
    
`

const HeaderHome = () => {

    return (
        <HeaderWrapper>
            <LanguagesWrapper>
                <a href=""><Language src={france} alt="français" /></a>
                <a href=""><Language src={nederlands} alt="dutch" /></a>
                <a href=""><Language src={uk} alt="english" /></a>
            </LanguagesWrapper>
        </HeaderWrapper>
    )
}

export default HeaderHome;