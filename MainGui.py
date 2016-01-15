'''
Created on Feb 14, 2015

@author: Sam
'''
import Tkinter as tk
from Tkinter import *
from PIL import ImageTk, Image, ImageOps
from ArtWork import *
import shutil
import tkFileDialog
from sam.project.RankMenu import *
from sam.project.ScrollList import *
import PIL.Image
from MakeThumbs import *



class MainGui():

        
        
        def __init__(self,master):
                csvFile = "C:\Users\Sam\workspace\ArtConnector\sam\project\ArtWorks\ArtWorks.csv"
                self.master = master
                self.frame = tk.Frame(master)
                self.statcsv="C:\Users\Sam\workspace\ArtConnector\sam\project\ArtWorks\ArtWorks.csv"
                
                self.lbl = Label(master , text = "Art Connector")
                self.lbl.pack()
                
                self.lbl1 = Label(master , text = "What would you like to do?")
                self.lbl1.pack()
                
                self.btn = Button(master , text = "Enter New Work" ,width = 25, command = self.goNewWork )
                self.btn.pack()
                
                self.btn1 = Button(master , text = "Find Artists" ,width = 25, command = self.goRankGui )
                self.btn1.pack()
                self.frame.pack()
                

        def goRankGui(self):
                
                self.newWindow = tk.Toplevel(self.master)
                self.app = RankGui(self.newWindow,image = None,name =None,title= None)   
        
        def goNewWork(self):
                self.newWindow = tk.Toplevel(self.master)
                self.app = NewWorkGui(self.newWindow) 
                

class NewWorkGui():

        def __init__(self , master):
                self.master = master
                self.frame = tk.Frame(master)
                master.title("Enter New  Work")
                
                self.artistString = tk.StringVar()
                self.artworkString = tk.StringVar()
                
                label_artconn = tk.StringVar()
                artistLabel = tk.StringVar()
                artWorkLabel =tk.StringVar()
                
                self.label_1 = Label(self.frame, textvariable = label_artconn )
                self.label_1.pack()
                label_artconn.set( "Art Connector")
                
                label_name = Label(self.frame, textvariable = artistLabel )
                label_name.pack()
                artistLabel.set( "Enter Artist's Name")
                
                entry_artist = Entry(self.frame, width=30,textvariable=self.artistString)
                entry_artist.pack()
                self.artistString.set( "Artist's Name" )
                
                label_workname = Label(self.frame, textvariable = artWorkLabel )
                label_workname.pack()
                artWorkLabel.set( "Enter Artwork's Title")
                
                entry_artwork = Entry(self.frame,width=30, textvariable=self.artworkString)
                entry_artwork.pack()
                self.artworkString.set( "Artwork's Title" )
                
                self.findButton = Button(self.frame, text = 'Find Artwork', width = 25 , command = self.getImage)
                self.findButton.pack()
                
                self.enterButton = Button(self.frame, text = 'Enter Artwork', width = 25 , command = self.get_work)
                self.enterButton.pack()
                                
                self.testButton = Button(self.frame, text = 'Rank this Artwork', width = 25 , command = self.goRankGui)
                self.testButton.pack()
                self.frame.pack()
                
        
        def get_work(self):
                pics ="C:/Users/Sam/workspace/ArtConnector/sam/project/Photos"
                picSize = 400, 400         
                srcImg = PIL.Image.open(self.img.name)
                srcImg.thumbnail(picSize,PIL.Image.ANTIALIAS)
                
                self.newWork = ArtWork.ArtWork(self.artistString.get(), self.artworkString.get(), self.img, self.img.name)  
                rgb = self.newWork.rgbAverage(self.newWork.filename)
                fileName=self.newWork.filename.split('/')[-1]
                self.newWork.write(self.newWork.name, self.newWork.title,pics + "/" + fileName,rgb,1, 2.5, 2.5, 2.5, 2.5,
                                2.5,2.5,2.5,2.5)
                print self.newWork.filename
                self.newWork.getRGB("C:\Users\Sam\workspace\ArtConnector\sam\project\ArtWorks\ArtWorks.csv")
                
                shutil.copy2(self.img.name,"C:\Users\Sam\workspace\ArtConnector\sam\project\Photos" ) 
                root.geometry("350x350")
                self.frame.mainloop()
    
        
        def getImage (self):
               
                self.img = tkFileDialog.askopenfile(parent=self.frame,mode='rb',title='Choose a file')
                print (self.img.name)

        
        def printArtwork(self):
                print (self.newWork.name, self.newWork.filename)
                rgb = self.newWork.rgbAverage(self.newWork.filename)
                self.newWork.write(self.newWork.name, self.newWork.title,self.newWork.filename,rgb,1, 2.5, 2.5, 2.5, 2.5,
                                2.5,2.5,2.5,2.5)
                self.newWork.getRGB("C:\Users\Sam\workspace\ArtConnector\sam\project\ArtWorks\ArtWorks.csv")
        
        
        def goRankGui(self):
                self.newWindow = tk.Toplevel(self.master)
                self.frame.destroy()
                self.app = RankGui(self.newWindow, self.newWork.img, self.newWork.name, self.newWork.title)   

class RankGui:
        
        def __init__(self, master, image, name, title ):
            if name is None:
                self.first = TRUE
                name = "Leonardo da Vinci"
                title = "Mona Lisa"
                image = "C:\Users\Sam\workspace\ArtConnector\sam\project\Photos\Mona.jpg"       
            global bigImage    
            self.statcsv = "C:\Users\Sam\workspace\ArtConnector\sam\project\ArtWorks\ArtWorks.csv"
            self.artist = name
            self.artwork = title
            
            self.size = 400, 400
            self.imageDir = "C:\Users\Sam\workspace\ArtConnector\sam\project\Photos"
            self.imgfile = image

            self.master = master
            self.master.geometry("850x800")
           
            master.title("Rank Work")
            self.imgObj =Image.open(self.imgfile)
            self.imgObj.thumbnail(self.size, Image.ANTIALIAS)
            bigImage  = ImageTk.PhotoImage(self.imgObj)
            self.display = Label(self.master, image=bigImage, text= self.artist + "\n" + self.artwork , compound =TOP )
            self.display.config(image = bigImage)
            self.display.after(300, self.updateImage)
           
            self.display.grid(row= 1, column = 2, columnspan= 4 )
            self.savephoto = bigImage
            self.currentThumbs = self.viewer(self.imageDir,8, 5, 0, "ArtThumbs") 
           
            size = 300, 50
            self.logo =PIL.Image.open('C:\\Users\\Sam\\workspace\\ArtConnector\\sam\\project\\Photos\\artlogo.png')
            self.logo.thumbnail(size, PIL.Image.ANTIALIAS)
            self.reLogo  = PIL.ImageTk.PhotoImage(self.logo)
            self.logoDisplay = Label(self.master, image=self.reLogo)
            self.logoDisplay.grid(row = 0, column=2, columnspan = 3, pady = 10)
            
            self.lblAnger = Label(self.master , text = "Anger")
            self.lblAnger.grid(row =2, column =0)
            self.anger= RankMenu(self.master, "Anger",3,0,N)
            
            self.lblAnticipation = Label(self.master , text = "Anticipation")
            self.lblAnticipation.grid(row =2, column =1)        
            self.anticipation = RankMenu(self.master, "Anticipation",3,1,N)
            
            self.lblJoy = Label(self.master , text = "Joy")
            self.lblJoy.grid(row =2, column =2)
            self.joy = RankMenu(self.master, "Joy",3,2,N)
            
            self.lblTrust = Label(self.master , text = "Trust")
            self.lblTrust.grid(row =2, column =3)
            self.trust = RankMenu(self.master, "Trust",3,3,N)
            
            self.lblFear = Label(self.master , text = "Fear")
            self.lblFear.grid(row =2, column =4)
            self.fear = RankMenu(self.master, "Fear",3,4,N)
            
            self.lblSurprise = Label(self.master , text = "Surprise")
            self.lblSurprise.grid(row =2, column =5)
            self.surprise = RankMenu(self.master, "Surprise",3,5,N)
            
            self.lblSadness = Label(self.master , text = "Sadness")
            self.lblSadness.grid(row =2, column =6)
            self.sadness = RankMenu(self.master, "Sadness",3,6,N)
            
            self.lblDisgust = Label(self.master , text = "Disgust")
            self.lblDisgust.grid(row =2, column =7)
            self.disgust =  RankMenu(self.master, "Disgust",3,7,N)
            
            self.input = NewWorkGui(self.master)
            self.input.frame.grid(row =0, column =6, columnspan =2,rowspan = 2)
            self.input.label_1.destroy()
            
            self.buttonframe =Frame(self.master)
            self.buttonframe.grid(row = 0, column = 0, columnspan = 2, rowspan = 2)
            
            self.namesScroll= ScrollList(self.buttonframe,0,0)
            
            artistEnterButton = Button(self.buttonframe, text="View Paintings", width = 25,command=self.getPaintings )
            artistEnterButton.grid( row = 3, column= 0, columnspan =2)

            similarEnterButton = Button(self.buttonframe, text="Similar Paintings", width =25, command=self.getSimilar)
            similarEnterButton.grid( row = 4, column= 0, columnspan = 2)
           
            enterButton = Button(self.master, text="Enter Rankings", command=self.getVals)
            enterButton.grid( row = 4, column= 3, columnspan = 2)
             
            self.master.mainloop()
        
        def updateImage(self):
            
            self.display.config(text= self.artist + "\n" + self.artwork)
            self.display.config(image = bigImage)
            self.display.after(300, self.updateImage)
        
        def getSimilar(self):
            
            self.thumbFrame.destroy()
            self.viewer(self.imageDir,8, 5, 0, "SimThumbs")
         
            
        def getVals(self):
            
            vals_list = []
            with open(self.statcsv, 'rb') as b:
                value = csv.reader(b)
                vals_list.extend(value)
                
            with open(self.statcsv, 'wb') as b:
                writer = csv.writer(b)
        
                for line, row in enumerate(vals_list):
                    if self.artwork == row[1]:
                        row[4] = int(row[4])+1
                        row[5] = float(row[5])+float(self.anger.getVal())
                        row[6] = float(row[6])+float(self.anticipation.getVal())
                        row[7] = float(row[7])+float(self.joy.getVal())
                        row[8] = float(row[8])+float(self.trust.getVal())
                        row[9] = float(row[9])+float(self.fear.getVal())
                        row[10] =float(row[10])+float(self.surprise.getVal())
                        row[11] =float(row[11])+float(self.sadness.getVal())
                        row[12] =float(row[12])+float(self.disgust.getVal())
                        writer.writerow(row)
                    else: 
                        writer.writerow(row)
                        
                        
        def getPaintings(self): 
           
            index = self.namesScroll.listbox.curselection()[0]
            self.artist = self.namesScroll.listbox.get(index)
            self.findFirst()
            self.imgObj =Image.open(self.imgfile)
            self.imgObj.thumbnail(self.size, Image.ANTIALIAS)
            bigImage  = ImageTk.PhotoImage(self.imgObj)
            self.thumbFrame.destroy()
            RankGui(self.master, self.imgfile, self.artist, self.artwork)
            
           
        def findIt(self, imgfile):
            
            with open(self.statcsv, 'rt') as f:
                reader =csv.reader(f, delimiter = ',')
                for row in reader:
                    if imgfile == row[2]:
                        self.artist = row[0] 
                        self.artwork = row[1]                                                       
                       
                           
        def findFirst(self):
            
            with open(self.statcsv, 'rt') as f:
                reader =csv.reader(f, delimiter = ',')
                for row in reader:
                    if self.artist == row[0]:
                        self.imgfile = row[2] 
                        self.artwork = row [1]                                                       
                        return self.artwork,self.artist
                            
       
        def makeThumbs(self, artist):
    
            with open(self.statcsv, 'rt') as f:
                reader = csv.reader(f, delimiter= ',')
                size = 100,100
                self.thumbs =[]
                
                for row in reader:
                    if artist == row[0]:
                        imgfile = row[2]
                        imgobj = Image.open(row[2])
                        imgobj.thumbnail(size, Image.ANTIALIAS)                        
                        self.thumbs.append((imgfile,imgobj))
                      
                return self.thumbs  
    
        
        def viewer(self, imgdir, cols, rownum, colnum, thumbtype):      
            
            if thumbtype == "ArtThumbs":
                thumbs = self.makeThumbs(self.artist)
                
            if thumbtype == "SimThumbs":
               
                thumbs = ArtWork.ArtWork.getSimilarArtWork(self.artwork)
           
            self.thumbFrame =Frame(self.master)
            self.thumbFrame.grid(row = 5, column = 0, columnspan = 8, rowspan = 2)
            rownum = rownum
            self.savephotos = []
            while thumbs:  
                thumbsrow, thumbs = thumbs[:cols], thumbs[cols:]
                colnum = colnum
                for (imgfile,imgobj) in thumbsrow:
                    photo   = ImageTk.PhotoImage(imgobj)
                    self.link  = Button(self.thumbFrame, image=photo)
                    handler = lambda savefile=imgfile:(self.findIt(savefile),self.thumbFrame.destroy(),
                                    RankGui(self.master, savefile, self.artist, self.artwork))
                    self.link.config(command=handler)
                    self.link.grid(row=rownum, column=colnum)
                    self.savephotos.append(photo)
                    colnum += 1
                rownum += 1
             
            return self.savephotos
                        

root = Tk()

root.title("window")

root.geometry("350x150")

cls = MainGui(root)

root.mainloop()
