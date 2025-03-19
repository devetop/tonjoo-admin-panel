import React, { createContext, useContext, useState } from 'react';


const SearchContext = createContext();

export const useSearch = () => useContext(SearchContext);

export const SearchProvider = ({ children }) => {
    const [isSearchOpen, setIsSearchOpen] = useState(false);

    return (
        <SearchContext.Provider value={{ isSearchOpen, setIsSearchOpen }}>
            {children}
        </SearchContext.Provider>
    );
};