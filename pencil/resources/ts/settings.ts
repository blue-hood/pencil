export const CANVAS_WIDTH = 320
export const CANVAS_HEIGHT = 140
export const CANVAS_ZOOM = 2
export const DRAW_BRUSH = 'medium'
export const DRAW_COLOR = 'black'

export const IMAGE_URL = '/images/image.png'

export const BRUSH_PATTERNS = {
    light: [[1]],
    medium: [[0, 1, 0], [1, 1, 1], [0, 1, 0]],
    bold: [
        [0, 1, 1, 1, 1, 0],
        [1, 1, 1, 1, 1, 1],
        [1, 1, 1, 1, 1, 1],
        [1, 1, 1, 1, 1, 1],
        [1, 1, 1, 1, 1, 1],
        [0, 1, 1, 1, 1, 0]
    ]
}

export const KEYCODE_UP = 38
export const KEYCODE_DOWN = 40
export const KEYCODE_LEFT = 37
export const KEYCODE_RIGHT = 39
export const KEYCODE_ENTER = 13
