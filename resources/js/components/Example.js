import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class ListArticles extends Component {
    constructor(props) {
        super(props);
        // In the state we store the list of articles and the article that is currently selected
        this.state = {
            error: null,
            isLoaded: false,
            articles: [],
            currentArticle: null
        }
    }

    componentDidMount() {
        // Fetch API in action 
        fetch('http://127.0.0.1:8000/api/articles')
            .then(res => res.json())
            .then(
                (result) => {
                    this.setState({
                        isLoaded: true,
                        articles: result.data
                    });
            },
            (error) => {
                this.setState({
                    isLoaded: true,
                    error
                });
            }
        )
    }

    render() {
        const { error, isLoaded, articles } = this.state;
        if (error) {
            return <div>Error: {error.message}</div>;
        }else if (!isLoaded){
            return <div>Loading...</div>
        }else if (articles.length == 0){
            return <div>No articles yet</div>
        }else {
            return (
                <div className="container">
                    {articles.map(article => (
                        <div className="article" key={article.id}>
                            <h2>{ article.title }</h2>
                            <p>{ article.description }</p>
                            <img src="{article.image}" />
                        </div>
                    ))}
                </div>
            );
        }
    }
}

if (document.getElementById('listArticles')) {
    ReactDOM.render(<ListArticles />, document.getElementById('listArticles'));
}