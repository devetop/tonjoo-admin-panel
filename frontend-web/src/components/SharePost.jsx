import FacebookIcon from '@/assets/svgs/share-facebook.svg';
import LinkedinIcon from '@/assets/svgs/share-linkedin.svg';
import PinterestIcon from '@/assets/svgs/share-pinterest.svg';
import TwitterIcon from '@/assets/svgs/share-twitter.svg';
import WhatsappIcon from '@/assets/svgs/share-whatsapp.svg';
import Image from 'next/image';

const icons = {
    facebook: FacebookIcon,
    linkedin: LinkedinIcon,
    pinterest: PinterestIcon,
    twitter: TwitterIcon,
    whatsapp: WhatsappIcon,
};

const handleShare = (platform) => {
    // Define your share logic here based on the platform
    console.log(`Sharing to ${platform}`);
};

export default function SharePost(props) {
    const {permalink, title, image, className="", classNameChild, share = "facebook,twitter,linkedin,pinterest,whatsapp"} = props;
    const sharePlatforms = share.split(',');
    return(
        <>
            <div className={`flex flex-row -m-2 lg:-m-3 ${className || ''}`}>
                {sharePlatforms.map((platform, index) => (
                    <div key={index} className={`p-2 lg:p-3 ${classNameChild}`}>
                        <button className="bg-transparent border-0" onClick={() => handleShare(platform)}>
                            <Image 
                                src={icons[platform]}
                                width={50}
                                height={50}
                                alt={''}
                            />
                        </button>
                    </div>
                ))}
            </div>
        </>
    );
};
