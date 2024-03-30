function generateChatBoxMessage(isChatGPTMessage, messageText) {
    // Get message template
    var template = (isChatGPTMessage ? $("#chat-left").html() : $("#chat-right").html())
    var messageBox = $(template);
    messageBox.find('#chat-message').text(messageText)
    $('#chat-content').append(messageBox)
}

$(document).on("click","#submit", function(e){
    e.preventDefault();

    var form = $("#chatbot")
    var formData = form.serialize()
    var textarea = form.find('textarea[name="message"]')
    generateChatBoxMessage(false, textarea.val());
    textarea.val('');

    $.ajax({
        type:"post",
        url: 'chatbot',
        data: formData,
        success:function(answer) {
            generateChatBoxMessage(true,  answer)
        },
    });
});
