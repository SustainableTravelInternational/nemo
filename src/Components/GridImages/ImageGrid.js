import React from 'react';
import './ImageGrid.css';
import ImageCard from './ImageCard';

const renderImages = (data, changeImage, changeView) => {
    console.log(data);
    return data.map(item => {
        return (
            <ImageCard
                image={item}
                changeImage={changeImage}
                changeView={changeView}
            />
        );
    });
};

const ImageGrid = props => {
    const { changeImage, changeView, data } = props;
    return (
        <div className={'ImageGrid'}>
            {renderImages(data, changeImage, changeView)}
        </div>
    );
};

export default ImageGrid;
