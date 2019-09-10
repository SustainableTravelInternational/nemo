import React from 'react';
import './ImageGrid.css';
import ImageCard from './ImageCard';

const renderImages = images => {
    return images.map(item => {
        return <ImageCard image={item} key={item.id} />;
    });
};

const ImageGrid = props => {
    const { images } = props;

    return <div className={'ImageGrid'}>{renderImages(images)}</div>;
};

export default ImageGrid;
