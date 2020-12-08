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
            url: 'api/articles/',
            links: [],
            currentArticle: null,
        }
    }

    componentDidMount() {
        // Fetch Articles and another data
        fetch(this.state.url)
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
        this.setState({
            url: this.state.links.next,
        });
        
        this.componentDidMount();
        console.log(this.state.links.next);
        console.log(this.state.url);

    }

    prevPage(){
        this.setState({
            url: this.state.links.prev,
        });

        this.componentDidMount();
    }

    firstPage(){
        this.setState({
            url: this.state.links.first,
        });

        this.componentDidMount();
    }

    lastPage(){
        this.setState({
            url: this.state.links.last,
        });

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
                    <button className="btn btn-default" onClick={this.firstPage.bind(this)}>First</button>
                    <button className="btn btn-default" onClick={this.lastPage.bind(this)}>Last</button>
                    <button className="btn btn-default" onClick={this.prevPage.bind(this)}>Prev</button>
                </div>
            );
        }
    }
}

if (document.getElementById('listArticles')) {
    ReactDOM.render(<ListArticles />, document.getElementById('listArticles'));
}