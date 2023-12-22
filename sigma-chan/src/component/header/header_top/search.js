import React from 'react';
import style from './style/search.module.css';

const Search = () => {
    return (
        <div className={style.searchBar}>
            <form>
                <input type="text" placeholder="Пошук по каталогу..."></input>
                <button type="submit">Пошук</button>
            </form>
        </div>
    );
};

export default Search;