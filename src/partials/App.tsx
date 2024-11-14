import { AppInterface } from "../interfaces/interfaces"

export const App: React.FC<AppInterface> = ({title, text, url}) => {

    return (
        <div className="container">
            <div className="container-wrap">
                <h1 className="title">{title}</h1>
                <div className="text-wrap">
                    {
                        url ? 
                        <p className="text"><a href={url} target='_blank'>{text}</a></p> 
                        : 
                        <p className="text">{text}</p>
                    }
                </div>
            </div>
        </div>
    )
}