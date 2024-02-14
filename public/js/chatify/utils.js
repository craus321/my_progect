/**
 * Преобразует строку даты в строку "сколько времени назад".
 * @param dateString - Строка даты для преобразования в строку "сколько времени назад".
 * @returns Строка, которая сообщает пользователю, как давно была указанная дата.
 */
function dateStringToTimeAgo(dateString) {
    const now = new Date();
    const date = new Date(dateString);
    const seconds = Math.floor((now - date) / 1000);
    const minutes = Math.floor(seconds / 60);
    const hours = Math.floor(minutes / 60);
    const days = Math.floor(hours / 24);
    const weeks = Math.floor(days / 7);
    if (seconds < 60) {
        return "только что";
    } else if (minutes < 60) {
        return `${minutes} мин. назад`;
    } else if (hours < 24) {
        return `${hours} ч. назад`;
    } else if (days < 7) {
        return `${days} дн. назад`;
    } else {
        return `${weeks} нед. назад`;
    }
}

/**
 * Возвращает функцию, которая, при вызове, будет ждать определенное количество времени перед выполнением
 * исходной функции.
 * @param callback - Функция, которая будет выполнена после задержки.
 * @param delay - Количество времени для ожидания перед вызовом функции обратного вызова.
 * @returns Функция, которая вызовет функцию обратного вызова после задержки.
 */
function debounce(callback, delay) {
    let timerId;
    return function (...args) {
        clearTimeout(timerId);
        timerId = setTimeout(() => {
            callback.apply(this, args);
        }, delay);
    };
}
