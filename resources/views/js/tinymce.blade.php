
<script>
    const api_key = '5FEcMWmN03LGikhM2EzjT3BlbkFJC0YLaNlfJbwi87sQhNd4';

    // var signaturesJson = JSON.parse($('#all_signatures_json').html());
    function GxTinyMceInit(selector){
        tinymce.init({
            selector: selector,
            plugins: 'gxmedia ai powerpaste casechange autolink directionality advcode visualblocks image link media codesample table charmap pagebreak fullscreen nonbreaking anchor tableofcontents insertdatetime advlist lists checklist wordcount formatpainter permanentpen quickbars emoticons advtable mergetags typography',
            menubar: 'file edit view insert format tools table tc help',
            toolbar: "gxmedia | signatures | fullscreen | aidialog aishortcuts | undo redo | blocks fontsizeinput | fontfamily | forecolor backcolor | bold italic | align numlist bullist | link unlink image | table media |  outdent indent | strikethrough forecolor backcolor | emoticons checklist | code | anchor codesample mergetags | ltr rtl casechange", // Note: if a toolbar item requires a plugin, the item will not present in the toolbar if the plugin is not also loaded.
            // toolbar_sticky: true,
            // toolbar_sticky_offset: 108,
            image_advtab: true,
            image_uploadtab: true,
            height: 700,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            toolbar_mode: 'sliding',
            tinycomments_mode: 'embedded',
            content_style: '.mymention{ color: gray; }' + 
                'img { max-width: 100%; height: auto; }' +
                'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
            contextmenu: 'image editimage table spellchecker configurepermanentpen',
            a11y_advanced_options: true,
            image_caption: false,
            skin: 'oxide',
            setup: function(editor) {

                
                // //Signutres
                // var toggleState = false;
                // const menuItems = signaturesJson.map(item => {
                //     return {
                //         type: 'menuitem',
                //         text: item.name,
                //         onAction: function(e) {
                //         fetch(item.url)
                //             .then(response => response.text())
                //             .then(content => {
                //                 editor.setContent(content);
                //             })
                //             .catch(error => {
                //                 console.error("Error loading content:", error);
                //             });
                //         }
                //     }
                // });
    
                /* example, adding a toolbar menu button */
                // editor.ui.registry.addMenuButton('signatures', {
                //     text: 'Signatures',
                //     fetch: function(callback) {
                //         var items = menuItems;
                //         callback(items);
                //     }
                // });
            },
            mergetags_list: [{
                title: 'Client',
                menu: [{
                    value: 'Client.LastCallDate',
                    title: 'Call date'
                },
                    {
                        value: 'Client.Name',
                        title: 'Client name'
                    }
                ]
            },
                {
                    title: 'Proposal',
                    menu: [{
                        value: 'Proposal.SubmissionDate',
                        title: 'Submission date'
                    }]
                },
                {
                    value: 'Consultant',
                    title: 'Consultant'
                },
                {
                    value: 'Salutation',
                    title: 'Salutation'
                }
            ],
            relative_urls : false,
            entity_encoding : 'raw',
            forced_root_block : 'p',
            //invalid_elements: 'div',
            extended_valid_elements: 'font[face|size|color]',
            // content_style: 'body { font-family: georgia, palatino, serif; font-size: 14px;}',
            powerpaste_allow_local_images: true,
            powerpaste_word_import: 'prompt',
            powerpaste_html_import: 'prompt',
            //convert_fonts_to_spans : false,
            paste_merge_formats: true,
            // ai_shortcuts: [
            //   { title: 'Format as marketing email', prompt: 'Turn this content into an HTML-formatted marketing email in fixed-width and mobile-friendly table form, following screen width best practices' },
            //   { title: 'Generate call to action', prompt: 'Generate an appropriate and short call to action for this email, in the form a button.' }
            // ],
            //   ai_request: (request, respondWith) => {
            //     const openAiOptions = {
            //       method: 'POST',
            //       headers: {
            //         'Content-Type': 'application/json',
            //         'Authorization': `Bearer ${api_key}`
            //       },
            //       body: JSON.stringify({
            //         model: 'gpt-3.5-turbo',
            //         temperature: 0.7,
            //         max_tokens: 800,
            //         messages: [{ role: 'user', content: request.prompt }],
            //       })
            //     };
                // respondWith.string((signal) => window.fetch('https://api.openai.com/v1/chat/completions', { signal, ...openAiOptions })
                //   .then(async (response) => {
                //     if (response) {
                //       const data = await response.json();
                //       if (data.error) {
                //         throw new Error(`${data.error.type}: ${data.error.message}`);
                //       } else if (response.ok) {
                //         // Extract the response content from the data returned by the API
                //         return data?.choices[0]?.message?.content?.trim();
                //       }
                //     } else {
                //       throw new Error('Failed to communicate with the ChatGPT API');
                //     }
                //   })
                // );
            //   }

        });

    }
    $(document).ready(function(){
        GxTinyMceInit('textarea.tinymce');
    });
</script>
