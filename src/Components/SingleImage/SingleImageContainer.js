import React, { useState, useEffect } from 'react';
import axios from 'axios';
import './SingleImageContainer.css';

import DummyData from './../../DummyData';

const SingleImageContainer = props => {
    const { id } = props;
    const singleImage = DummyData.filter(x => x.id === parseInt(id))[0];
    const [image, setImage] = useState(singleImage);

    const fetchImage = () => {
        async function fetchData() {
            const res = await axios.get('https');
            res.then(res => setImage(res.data).catch(err => console.log(err)));
        }
        fetchData();
    };

    useEffect(() => fetchImage());

    return (
        <div className={'SingleImageContainer'}>
            {image ? (
                <img
                    src={image.imageUrl}
                    className={'ImageCard_image'}
                    alt={'Nemo'}
                />
            ) : (
                <h2>Image not found</h2>
            )}
        </div>
    );
};

export default SingleImageContainer;
