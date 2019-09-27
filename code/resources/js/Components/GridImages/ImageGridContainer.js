import React, { useState, useEffect } from 'react';
import axios from 'axios';
import ImageGrid from './ImageGrid';
import SubNavBar from '../Nav/SubNavBar';

const ImageGridContainer = () => {
    const [images, setImages] = useState([]);
    const [categories, setCategories] = useState([]);
    const [selectedCategory, setSelectedCategory] = useState('All');

    const fetchImages = category => {
        axios
            .get('/api/photos', { params: { category: category } })
            .then(res => {
                setImages(res.data);
            })
            .catch(err => console.log(err));
    };

    const fetchCategories = () => {
        axios
            .get('/api/categories')
            .then(res => {
                let fetchedCategories = res.data.map(cat => cat.name);
                setCategories(['All', ...fetchedCategories]);
            })
            .catch(err => console.log(err));
    };

    useEffect(() => {
        if (selectedCategory === 'All') return fetchImages();
        return fetchImages(selectedCategory);
    }, [selectedCategory]);

    useEffect(() => {
        fetchCategories();
    }, []);

    return (
        <>
            <SubNavBar
                categories={categories}
                setSelectedCategory={setSelectedCategory}
            />
            <ImageGrid images={images} />
        </>
    );
};

export default ImageGridContainer;
