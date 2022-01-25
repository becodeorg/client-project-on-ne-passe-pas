import React, { Component } from "react";
import QrReader from 'react-qr-scanner';

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
            height: '10rem',
            width: '10rem',
        };

        const textStyle = {
            fontSize: '1rem',
            textAlign: 'center',
            marginTop: '6rem',
            color: 'white'
        }

        return (
            <React.Fragment>
                <section className="QR-zone">
                    <QrReader
                        delay={100}
                        style={previewStyle}
                        onError={this.handleError}
                        onScan={this.handleScan} />
                </section>
                <p style={textStyle}>
                    {this.state.result}
                </p>
            </React.Fragment>
        )
    }
}

export default QrContainer;