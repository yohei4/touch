import React, { useRef, useEffect } from 'react';

interface PreviewProps {
    logo: any;
}

const Preview = (props: PreviewProps) => {
    const canvas = useRef(null);

    useEffect(() => {
        console.log(props.logo);
        if(props.logo !== undefined) previewImage(props.logo);
    });

    //画像ファイルを表示
    const previewImage = (file: any): void => {
        const reader = new FileReader();
        const ctx = canvas.current.getContext('2d');
        const image = new Image() as HTMLImageElement;
        reader.onload = (function() {
            image.src = reader.result.toString();
            image.onload = (function () {
                canvas.current.width = image.width;
                canvas.current.height = image.height;
                ctx.drawImage(image, 0, 0);
            });
        });
        reader.readAsDataURL(file);
    };

    //画像ファイルを非表示
    const hideImage = (): void => {
        const ctx = canvas.current.getContext('2d');
        ctx.clearRect(0, 0, canvas.current.width, canvas.current.height);
    }

    return (
        <div className="preview-outer">
            <canvas ref={canvas} id="preview"></canvas>
        </div>
    )
};

export default Preview;
