import React, { Component } from 'react';
import axios from 'axios';
import ImageGrid from './ImageGrid';
import DummyData from '../../DummyData';

class ImageGridContainer extends Component {
    constructor(props) {
        super(props);
        this.state = {
            error: null,
            isLoaded: false,
            data: DummyData,
        };
    }

    componentDidMount() {
        axios.get('https').then(res => {
            this.setState({ data: [...this.state.data, ...res.data] });
        });
    }

    render() {
        const { changeView, changeImage } = this.props;
        return (
            <ImageGrid
                data={this.state.data}
                changeImage={changeImage}
                changeView={changeView}
            />
        );
    }
}

export default ImageGridContainer;
