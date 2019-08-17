import VirtualElement from '../virtual-element';

export default class extends VirtualElement<HTMLButtonElement> {
    onClick: (image: HTMLImageElement) => void = () => {};

    constructor(element: HTMLButtonElement) {
        super(element);

        const image = this.element.getElementsByTagName('img')[0];
        this.element.onclick = () => {
            this.onClick(image);
        };
    }
}