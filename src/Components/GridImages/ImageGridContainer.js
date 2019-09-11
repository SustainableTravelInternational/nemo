import React, { useState, useEffect } from 'react';
import axios from 'axios';
import ImageGrid from './ImageGrid';

import DummyData from '../../DummyData';

const ImageGridContainer = () => {
    const [images, setImages] = useState(DummyData);
    const [categories, setCategories] = useState(['all', 'coral', 'damaged']);
    const [selectedCategory, setSelectedCategory] = useState('all');

    const fetchImages = () => {
        async function fetchData() {
            const res = await axios.get('https');
            res.then(res => setImages(res.data).catch(err => console.log(err)));
        }
        fetchData();
    };

    const fetchCategories = () => {
        async function fetchData() {
            const res = await axios.get('https');
            res.then(res =>
                setCategories(res.data).catch(err => console.log(err))
            );
        }
        fetchData();
    };

    useEffect(() => fetchImages());
    useEffect(() => fetchCategories());

    const filteredImages = () => {
        if (selectedCategory === 'all') return images;
        return images.filter(image => image.categories == selectedCategory);
    };
    return (
        <div>
            <select
                style={{ textAlign: 'center' }}
                name=""
                id=""
                onChange={event => setSelectedCategory(event.target.value)}
            >
                {categories.map(category => (
                    <option value={category} key={category}>
                        {category}
                    </option>
                ))}
            </select>
            <ImageGrid images={filteredImages()} />
        </div>
    );
};

export default ImageGridContainer;
