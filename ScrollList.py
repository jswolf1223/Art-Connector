'''
Created on Feb 25, 2015

@author: Sam
'''
from Tkinter import *
from sam.project.ArtWork import ArtWork

class ScrollList(object):
 

    def __init__(self, master, row, column):
              
        lblSelect = Label(master , text = "Select an Artist:", anchor = S)
        lblSelect.grid(row =0, column =0, columnspan = 2, sticky = S)
        artistList=ArtWork.getAllArtists()
        scrollbar = Scrollbar(master)
        
        self.listbox = Listbox(master, width = 30, height = 9, yscrollcommand=scrollbar.set)
        for artist in artistList:
            self.listbox.insert(END, artist)
        self.listbox.grid(row=1, column=0, columnspan=2,rowspan=2)
        scrollbar.config(command=self.listbox.yview)
        
        
