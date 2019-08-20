const Post = require('../models/post');
const fs = require('fs');
const path = require('path');


exports.createPost = (req,res,next) => {

  const url = req.protocol + '://' + req.get('host');
  const post = new Post({
    title: req.body.title,
     content: req.body.content,
      imagePath: url + "/images/" + req.file.filename,
      creator: req.userData.userId
  })

    post.save().then(createdPost => {

  res.status(201).json({
    message: "Post added Successfully !!",
    // postId: createdPost.id
    post:{
      //...createdPost,
      id:  createdPost.id,
      title: createdPost.title,
      content: createdPost.content,
      imagePath: createdPost.imagePath,
      creator: createdPost.creator
    }

    });
  }).catch(error => {
    res.status(500).json({        // 500 => something went wrong on Server
      message: "Creating a post Failed"
    });
  });

}

exports.getPost = (req, res)=> {
  const pageSize = +req.query.pagesize;
 const currentPage = +req.query.page;
 const postQuery = Post.find().sort({ _id: -1 });
 let fetchedPosts;
 if (pageSize && currentPage){
   postQuery
   .skip(pageSize * (currentPage - 1))
   .limit(pageSize);
 }
postQuery.then(documents => {
 fetchedPosts = documents;
 return Post.countDocuments();
   }).then(count =>{
     res.status(200).json({
     message: "Post fetched Successfully !!",
     posts: fetchedPosts,
     maxPosts: count

   });
}).catch(error =>{
 res.status(500).json({
   message: "Fetching Post Failed"
 })
})


}


exports.deletePost = (req, res) => {

  let Path2 = '';

  // Get ImageUrl
  Post.findById(req.params.id).then(post => {
   const url = req.protocol + '://' + req.get('host');
   let Path = '..'+post.imagePath.split(url)[1];
   Path = path.join(__dirname, Path);
   Path2 = Path;

  });

  Post.deleteOne({_id: req.params.id, creator: req.userData.userId }).then(result => {

    if(result.n > 0){

      // Delete image
      fs.unlink(Path2, (err) => {
        if (err) throw err;
        console.log('successfully deleted ' + Path2);
      });

      res.status(200).json({ message: "Post deleted! "});
    } else {
      res.status(401).json({ message: "Not Authorized"})
    }

  }).catch(error =>{
    console.log(error);
    res.status(500).json({
      message: "Failed to Delete"
    })
  })
  //res.status(200).json({message: "Post deleted! "});
}

exports.updatePost = (req, res)=>{
  let imagePath = req.body.imagePath;
  if (req.file){
    const url = req.protocol + '://' + req.get('host');
    imagePath = url + '/images/' + req.file.filename;
  }
  const post = new Post({
    _id: req.body.id,
    title: req.body.title,
    content: req.body.content,
    imagePath: imagePath,
    creator: req.userData.userId
  })
  console.log(post);
  Post.updateOne({_id: req.params.id, creator: req.userData.userId }, post).then(result =>{

    if(result.n > 0){
      res.status(200).json({ message: "Update Successful!!"});
    } else {
      res.status(401).json({ message: "Not Authorized"})
    }
    res.status(200).json({message: "Update Successful !!"});
  }).catch(error => {
    res.status(500).json({
      message: "Could not Update Post "
    });
  })
}

exports.getuserPost = (req, res) => {
  Post.findById(req.params.id).then(post => {
    if (post){
      res.status(200).json(post);
    }else{
      res.status(404).json({message: "Post not Found !!"});
    }
  }).catch(error =>{
    res.status(500).json({
      message: "Fetching request Post Failed"
    })
  })
}
