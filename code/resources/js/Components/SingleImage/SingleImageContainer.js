import React, { useState, useEffect } from 'react';
import axios from 'axios';
import './SingleImageContainer.css';

const SingleImageContainer = ({ id }) => {
    const [image, setImage] = useState({});

    const fetchImage = () => {
        axios
            .get('/api/photos', {
                params: {
                    id: id,
                },
            })
            .then(res => {
                if (res.length) {
                    setImage(res.data[0]);
                } else {
                    setImage({ error: 'Image Could Not Be Found' });
                }
            })
            .catch(err => console.log(err));
    };

    useEffect(() => fetchImage());

    return (
        <div className={'SingleImageContainer'}>
            {image.error ? (
                <h2>{image.error}</h2>
            ) : image.photo ? (
                <img
                    src={image.photo}
                    className={'ImageCard_image'}
                    alt={'Nemo'}
                />
            ) : (
                <h2>Image Loading...</h2>
            )}
        </div>
    );
};

export default SingleImageContainer;
