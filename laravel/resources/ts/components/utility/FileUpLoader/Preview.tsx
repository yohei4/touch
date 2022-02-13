import React, { useRef, useEffect, forwardRef, Ref } from 'react';
import Button from './Button';
import Converter from '../../Converter';

interface PreviewProps {
    photo: {key: number, original: File, base64: string};
    id: number;
    index: number;
    onClick(event: any, index: number): void;
}

const Preview = (props: PreviewProps) => {
    const PhotoItem = useRef(null);
    const imgRef = useRef<HTMLImageElement>(null);

    useEffect(() => {
        if(props.photo.original) previewImage(props.photo.original);
    }, [props.photo]);

    // 画像ファイルを表示
    const previewImage = (file: File): void => {
        Converter.toBase64(file).then(base64 => {
            props.photo.base64 = base64;
            imgRef.current.src = base64;
        });
    };

    // 画像ファイルを非表示
    // const deleteImage = (): void => {
    //     const ctx = canvas.current.getContext('2d');
    //     ctx.clearRect(0, 0, canvas.current.width, canvas.current.height);
    // }

    return (
        <li className="photo-item" ref={PhotoItem}>
            <picture>
                <img className="photo-item__preview" ref= {imgRef} />
            </picture>
            <Button
                id={props.id}
                onClick={e => props.onClick(e, props.index)}
            />
        </li>
    )
};

export default Preview;