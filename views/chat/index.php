
<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $data array */

$this->title = 'Chat Section';
?>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card chat-app">
                <div id="plist" class="people-list">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                    <ul class="list-unstyled chat-list mt-2 mb-0" id="user_section" style="max-height: 400px; overflow-y: auto;">
                        <?php foreach ($data['documents'] as $doc): ?>
                            <?php
                            $lastMessages = $doc['fields']['last_message'] ?? [];
                            if (!empty($lastMessages)):?>
                                <li class="clearfix" onclick="showChat('<?php echo $doc['name'] ?>' , this)">
                                    <div class="about">
                                        <div class="name">
                                            <?php
                                            $userId = $lastMessages['mapValue']['fields']['owner']['stringValue'] ?? null;
                                            $user = $userId ? \app\models\Users::findOne($userId) : null;
                                            echo $user->name ?? 'Unknown User';
                                            ?>
                                        </div>
                                        <div class="status">
                                            <?php echo $lastMessages['mapValue']['fields']['text']['stringValue'] ?? 'No message'; ?>
                                        </div>
                                    </div>
                                </li>
                            <?php else: ?>
                                <li class="clearfix" onclick="showChat('<?php echo $doc['name'] ?>')">
                                    <div class="about">
                                        <div class="name">Unknown User</div>
                                        <div class="status">No message available</div>
                                    </div>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="chat">
                    <div class="chat-header clearfix">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                </a>
                                <div class="chat-about">
                                    <h6 class="m-b-0">Aiden Chavez</h6>
                                    <small>Last seen: 2 hours ago</small>
                                </div>
                            </div>
                            <div class="col-lg-6 hidden-sm text-right">
                                <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="chat-history" style="max-height: 400px; overflow-y: auto;">
                        <ul class="m-b-0" id="chatsection" style="height: 400px;width: 100%;">

                        </ul>
                    </div>
                    <div class="chat-message clearfix d-flex">
                        <div class="input-group mb-0">
                            <input type="text" class="form-control" id="inputValue" placeholder="Enter text here...">
                        </div>
                        <div class="input-group mb-0">
                            <button class="btn btn-primary" onclick="sendMessage()">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    async function showChat(id , bloc) {
        // const url = `https://firestore.googleapis.com/v1/projects/homefixuz/databases/(default)/documents/chats`;
        var chatsection = document.getElementById('chatsection');
        var blocs = document.querySelectorAll('.clearfix');
        var userid = "<?php echo Yii::$app->user->identity->getId() ?>"
        const url = `https://firestore.googleapis.com/v1/${id}/messages`;
        blocs.forEach((e)=>{
            e.classList.remove('active');
        })
        bloc.classList.add('active');

        console.log(url)
        chatsection.innerHTML  = '';
        chatsection.innerHTML += `
             <li class="clearfix">
                 <h1>Loading...</h1>
             </li>
            `
        chatsection.innerHTML  = '';
        sendMessageToApi("kljasndfklsa" , "kalsjndfklsa")
        try {
            const response = await fetch(url);
            if (!response.ok) {
                throw new Error('Chat not found.');
            }
            const data = await response.json();
            console.log(data)
            data.documents.forEach((e)=>{
                // console.log(e)
                const text = e.fields?.text?.stringValue ?? '';
                if(e.fields?.owner?.stringValue === userid){
                    chatsection.innerHTML +=`
                   <li class="clearfix">
                            <div class="message-data text-right">
                                <span class="message-data-time">${e.createTime}</span>
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                            </div>
                            <div class="message other-message float-right">${text}</div>
                        </li>`
                }else{
                    chatsection.innerHTML +=`
                   <li class="clearfix">
                            <div class="message-data">
                                <span class="message-data-time">${e.createTime}</span>
                            </div>
                            <div class="message my-message">${text}</div>
                        </li> `
                }
            })

        } catch (error) {
            console.error('Error fetching chat details:', error);
            alert('Error: ' + error.message);
        }
    }
    function sendMessage() {
        var chatsection = document.getElementById('chatsection');
        const messageInput = document.getElementById('inputValue');
        const messageText = messageInput.value;
        var userid = "<?php echo Yii::$app->user->identity->getId() ?>"
        if (messageText.trim() === '') return;
        chatsection.innerHTML += `
        <div class="message other-message float-right">
            ${messageText}
        </div> `;
        sendMessageToApi(messageText , userid)
        messageInput.value = '';
    }
    function sendMessageToApi(message , userid){
        const firestoreUrl = 'https://firestore.googleapis.com/v1/projects/homefixuz/databases/(default)/documents/chats';
        const firebaseToken = "";
        const messageData = {
            fields: {
                text: { stringValue: message }, // Message text
                sender: { stringValue: userid }, // Sender's ID
                timestamp: { timestampValue: new Date().toISOString() }, // Timestamp of the message
            }
        };

        fetch(firestoreUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${firebaseToken}`, // Pass the Firebase token for authentication
            },
            body: JSON.stringify(messageData),
        })
            .then(response => response.json())
            .then(data => {
                console.log('Message sent to Firestore:', data);
            })
            .catch(error => {
                console.error('Error sending message to Firestore:', error);
            });
    }

</script>
<style>
    body{
        background-color: #f4f7f6;
        margin-top:20px;
    }
    .card {
        background: #fff;
        transition: .5s;
        border: 0;
        margin-bottom: 30px;
        border-radius: .55rem;
        position: relative;
        width: 100%;
        box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
    }
    .chat-app .people-list {
        width: 280px;
        position: absolute;
        left: 0;
        top: 0;
        padding: 20px;
        z-index: 7
    }

    .chat-app .chat {
        margin-left: 280px;
        border-left: 1px solid #eaeaea
    }

    .people-list {
        -moz-transition: .5s;
        -o-transition: .5s;
        -webkit-transition: .5s;
        transition: .5s
    }

    .people-list .chat-list li {
        padding: 10px 15px;
        list-style: none;
        border-radius: 3px
    }

    .people-list .chat-list li:hover {
        background: #efefef;
        cursor: pointer
    }

    .people-list .chat-list li.active {
        background: #efefef
    }

    .people-list .chat-list li .name {
        font-size: 15px
    }

    .people-list .chat-list img {
        width: 45px;
        border-radius: 50%
    }

    .people-list img {
        float: left;
        border-radius: 50%
    }

    .people-list .about {
        float: left;
        padding-left: 8px
    }

    .people-list .status {
        color: #999;
        font-size: 13px
    }

    .chat .chat-header {
        padding: 15px 20px;
        border-bottom: 2px solid #f4f7f6
    }

    .chat .chat-header img {
        float: left;
        border-radius: 40px;
        width: 40px
    }

    .chat .chat-header .chat-about {
        float: left;
        padding-left: 10px
    }

    .chat .chat-history {
        padding: 20px;
        border-bottom: 2px solid #fff
    }

    .chat .chat-history ul {
        padding: 0
    }

    .chat .chat-history ul li {
        list-style: none;
        margin-bottom: 30px
    }

    .chat .chat-history ul li:last-child {
        margin-bottom: 0px
    }

    .chat .chat-history .message-data {
        margin-bottom: 15px
    }

    .chat .chat-history .message-data img {
        border-radius: 40px;
        width: 40px
    }

    .chat .chat-history .message-data-time {
        color: #434651;
        padding-left: 6px
    }

    .chat .chat-history .message {
        color: #444;
        padding: 18px 20px;
        line-height: 26px;
        font-size: 16px;
        border-radius: 7px;
        display: inline-block;
        position: relative
    }

    .chat .chat-history .message:after {
        bottom: 100%;
        left: 7%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
        border-bottom-color: #fff;
        border-width: 10px;
        margin-left: -10px
    }

    .chat .chat-history .my-message {
        background: #efefef
    }

    .chat .chat-history .my-message:after {
        bottom: 100%;
        left: 30px;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
        border-bottom-color: #efefef;
        border-width: 10px;
        margin-left: -10px
    }

    .chat .chat-history .other-message {
        background: #e8f1f3;
        text-align: right
    }

    .chat .chat-history .other-message:after {
        border-bottom-color: #e8f1f3;
        left: 93%
    }

    .chat .chat-message {
        padding: 20px
    }

    .online,
    .offline,
    .me {
        margin-right: 2px;
        font-size: 8px;
        vertical-align: middle
    }

    .online {
        color: #86c541
    }

    .offline {
        color: #e47297
    }

    .me {
        color: #1d8ecd
    }

    .float-right {
        float: right
    }

    .clearfix:after {
        visibility: hidden;
        display: block;
        font-size: 0;
        content: " ";
        clear: both;
        height: 0
    }

    @media only screen and (max-width: 767px) {
        .chat-app .people-list {
            height: 465px;
            width: 100%;
            overflow-x: auto;
            background: #fff;
            left: -400px;
            display: none
        }
        .chat-app .people-list.open {
            left: 0
        }
        .chat-app .chat {
            margin: 0
        }
        .chat-app .chat .chat-header {
            border-radius: 0.55rem 0.55rem 0 0
        }
        .chat-app .chat-history {
            height: 300px;
            overflow-x: auto
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 992px) {
        .chat-app .chat-list {
            height: 650px;
            overflow-x: auto
        }
        .chat-app .chat-history {
            height: 600px;
            overflow-x: auto
        }
    }

    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
        .chat-app .chat-list {
            height: 480px;
            overflow-x: auto
        }
        .chat-app .chat-history {
            height: calc(100vh - 350px);
            overflow-x: auto
        }
    }
</style>