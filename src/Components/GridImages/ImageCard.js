import React, { useState } from 'react';
import './ImageCard.css';

const ImageCard = props => {
    const [hover, setHover] = useState(false);
    const { image, changeImage, changeView } = props;
    const ImageCardHoverClasses = hover
        ? 'ImageCard_Hover-active'
        : 'ImageCard_Hover-inactive';

    const changeViewToImage = () => {
        changeImage(image);
        changeView('SingleImageContainer');
    };

    return (
        <div
            className={`ImageCard`}
            onClick={() => changeViewToImage()}
            onMouseEnter={() => setHover(true)}
            onMouseLeave={() => setHover(false)}
        >
            <img
                src={image.imageUrl}
                className={'ImageCard_image'}
                alt={'Nemo'}
            />
            <div className={`ImageCardTool ${ImageCardHoverClasses}`}>
                {image.longitude & image.latitude
                    ? `X: ${image.latitude}, Y: ${image.longitude}`
                    : 'location missing'}
                <br />
                {image.note ? image.note : 'No notes yet'}
            </div>
        </div>
    );
};

export default ImageCard;
