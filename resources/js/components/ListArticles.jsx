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
            links: [],
            currentArticle: null,
        }

        this.url = 'api/articles/';
    }

    componentDidMount() {
        // Fetch Articles and another data
        fetch(this.url)
            .then(res => res.json())
            .then((res) => {
                this.setState({
                    isLoaded: true,
                    articles: res.data,
                    links: res.links
                }); 
            },
            (error) => {
                this.setState({
                    isLoaded: true,
                    error
                });
            }
        );
    }

    nextPage(){
        this.url = this.state.links.next;

        window.scrollTo(0, 0);
        
        this.componentDidMount();
    }

    prevPage(){
        this.url = this.state.links.prev;

        window.scrollTo(0, 0);

        this.componentDidMount();
    }

    firstPage(){
        this.url = this.state.links.first;

        window.scrollTo(0, 0);

        this.componentDidMount();
    }

    lastPage(){
        this.url = this.state.links.last;

        window.scrollTo(0, 0);

        this.componentDidMount();
    }

    render() {
        const { error, isLoaded, articles} = this.state;
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
                            <img src={'storage/articles/images/' + article.image } />
                        </div>
                    ))}
                    <button className="btn btn-default" onClick={(e) => this.nextPage(e)}>Next</button>
                    <button className="btn btn-default" onClick={(e) => this.firstPage(e)}>First</button>
                    <button className="btn btn-default" onClick={(e) => this.lastPage(e)}>Last</button>
                    <button className="btn btn-default" onClick={(e) => this.prevPage(e)}>Prev</button>
                </div>
            );
        }
    }
}

if (document.getElementById('listArticles')) {
    ReactDOM.render(<ListArticles />, document.getElementById('listArticles'));
}