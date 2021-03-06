import * as React from 'react';
import { ResData } from '../../../config/api';
import { Link } from 'react-router-dom';

interface Props {
  data:ResData.Post;
}
interface State {
}

export class FeaturedPreview extends React.Component<Props, State> {
  public render () {
    const { attributes, id } = this.props.data;
    return <Link to={`/book/${id}`} style={{display: 'block', padding: '10px'}}>
          <div className="title" style={{overflow: 'hidden', whiteSpace:'nowrap', textOverflow:'ellipsis', marginBottom: '5px'}}>{ attributes.title }</div>
          <div className="biref">{ attributes.brief }</div>
        </Link>;
  }
}