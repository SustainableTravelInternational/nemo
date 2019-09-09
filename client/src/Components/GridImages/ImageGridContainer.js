import React, { useState, useEffect } from 'react';
import axios from 'axios';
import ImageGrid from './ImageGrid';
import SubNavBar from '../Nav/SubNavBar';

import DummyData from '../../DummyData';

const ImageGridContainer = () => {
    const [images, setImages] = useState(DummyData);
    const [categories, setCategories] = useState();
    const [selectedCategory, setSelectedCategory] = useState('All');

    const fetchImages = () => {
        // axios
        //     .get(process.env.REACT_APP_API_URL + '/photos')
        //     .then(res => {
        //         setImages(res.data);
        //     })
        //     .catch(err => console.log(err));
    };

    const fetchCategories = () => {
        axios
            .get(process.env.REACT_APP_API_URL + '/categories')
            .then(res => {
                let fetchedCategories = res.data.map(cat => cat.name);
                setCategories(['All', ...fetchedCategories]);
            })
            .catch(err => console.log(err));
    };

    useEffect(() => {
        fetchImages();
    }, []);

    useEffect(() => {
        fetchCategories();
    }, []);

    const filteredImages = () => {
        if (selectedCategory === 'All') return images;
        return images.filter(image =>
            image.categories.includes(selectedCategory)
        );
    };
    return (
        <>
            <SubNavBar
                categories={categories}
                setSelectedCategory={setSelectedCategory}
            />
            <ImageGrid images={filteredImages()} />
        </>
    );
};

export default ImageGridContainer;