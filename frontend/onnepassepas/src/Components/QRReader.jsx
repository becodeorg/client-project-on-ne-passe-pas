import React, { Component } from 'react';
import QrReader from 'react-qr-scanner';

import styled from 'styled-components';
import colors from '../Style/colors';

const QrWrapper = styled.div`
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-top: 5rem;
    margin-bottom: 5rem;
`

class QrContainer extends Component {
    constructor(props) {
        super(props)
        this.state = {
            result: "Mettez l'appareil bien en face du QR Code à scanner",
        };
        this.handleScan = this.handleScan.bind(this)
    }
    handleScan(result) {
        this.setState({
            result: "Mettez l'appareil bien en face du QR Code à scanner"
        });
    };

    handleError(err) {
        console.log(err)
    };


    render() {

        const previewStyle = {
            width: '20rem',
            // border: '10px solid #fff',
            // boxShadow : '0px 10px 10px rgba(0, 0, 0, 0.25)'
        };

        const textStyle = {
            marginTop: '20px',
            fontSize: '0.9rem',
            textAlign: 'center',
            color: '#E2D4D2',
            fontFamily: "'Helvetica', Arial, sans-serif",
            fontWeight: '200',
        }

        return (
            <React.Fragment>
                <QrWrapper>
                    <QrReader
                        delay={100}
                        style={previewStyle}
                        onError={this.handleError}
                        onScan={this.handleScan} />
                    <p style={textStyle}>
                        {this.state.result}
                    </p>
                </QrWrapper>
            </React.Fragment>
        )
    }
}

export default QrContainer;