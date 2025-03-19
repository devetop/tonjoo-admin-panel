export default function WidgetSubscribe(props) {
    const {className} = props;
    return(
        <>
            <form className={`${className || ''}`}>
                <div className="bg-white relative flex rounded-full overflow-hidden border-4 border-white">
                    <input type="email" placeholder="Enter your email here" className="text-text border-0 py-2 px-6 w-full focus:outline-0"/>
                    <button type="submit" className="bg-secondary text-white uppercase rounded-full py-2 px-6">Subscribe</button>
                </div> 
            </form>
        </>
    );
};
