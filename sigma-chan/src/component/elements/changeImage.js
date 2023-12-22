import { useState } from 'react';

const ChangeImage = () => {
    const [isHovered, setIsHovered] = useState(false);

    const handleHover = () => {
        setIsHovered(!isHovered);
    };

    return [isHovered, handleHover];
};

export default ChangeImage;
