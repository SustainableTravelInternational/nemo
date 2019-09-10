import React, { useState, useEffect } from 'react';
import './ImageGrid.css';
import axios from 'axios';
import ImageCard from './ImageCard';

import DummyData from '../../DummyData';

const renderImages = images => {
    return images.map(item => {
        return <ImageCard image={item} key={item.id} />;
    });
};

const ImageGrid = () => {
    const [images, setImages] = useState(DummyData);

    const fetchImages = () => {
        async function fetchData() {
            const res = await axios.get('https');
            res.then(res => setImages(res.data).catch(err => console.log(err)));
        }
        fetchData();
    };

    useEffect(() => fetchImages());

    return <div className={'ImageGrid'}>{renderImages(images)}</div>;
};

export default ImageGrid;
